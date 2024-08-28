def FAILED_STAGE

pipeline {
  agent any

  stages {
    stage("LAUNCHING") {
      steps {
        script {
          FAILED_STAGE=env.STAGE_NAME
        }

        sh label: 'Notify Mattermost', script:
        """
          slack \
            -h ${env.MATTERMOST} \
            -c jenkins \
            -u "Jenkins" \
            -i :dlabs: \
            -C "1974D2" \
            -T "${env.JOB_NAME} ${env.BUILD_DISPLAY_NAME}" \
            -m "Starting...\nBranch: ${env.BRANCH_NAME} \nPush: ${env.BUILD_TAG} \nMerge? ${BUILD_URL}input"
        """
      }
    }

    stage("PREPARE BE") {
      steps {
        script {
          FAILED_STAGE=env.STAGE_NAME
        }

        // Install Script
        sh label: 'Copy .env and update Composer', script:
        """
          cp .env.testing .env
          composer update
        """
      }
    }

    stage("PREPARE FE") {
      steps {
        script {
          FAILED_STAGE=env.STAGE_NAME
        }

        // Install Script
        sh label: 'Updating NPM Package', script:
        """
          npm update
        """
      }
    }


    stage("BUILD FE") {
      steps {
        script {
          FAILED_STAGE=env.STAGE_NAME
        }

        sh label: 'Build Production', script:
        """
          npm run prod
        """
      }
    }

    stage('TEST BE') {
      steps {
        script {
          FAILED_STAGE=env.STAGE_NAME
        }

        // sh label: 'Notify Approval Mattermost', script:
        // """
        //   slack \
        //     -h ${env.MATTERMOST} \
        //     -c jenkins \
        //     -u "Jenkins" \
        //     -i :dlabs: \
        //     -C "1974D2" \
        //     -T "${env.STAGE_NAME} Need Approval! ${currentBuild.fullDisplayName}" \
        //     -m "URL: [Open](${BUILD_URL}input)"
        // """

        // timeout(time: 48, unit: "HOURS") {
        //     input message: 'Do you want to approve the deployment?', ok: 'Yes'
        // }

        sh label: 'Testing Laravel', script:
        """
          php artisan migrate:fresh --seed
        """
      }
    }

    stage("RELEASE DEVELOP") {
      // when {
      //   anyOf {
      //     branch 'develop'
      //   }
      // }
      steps {
        script {
          FAILED_STAGE=env.STAGE_NAME
        }

        sshagent(credentials : ['ssh-server.hosting']) {
            sh '''
              ssh -p 2222 -o StrictHostKeyChecking=no root@192.168.112.2 << EOF
              cd /var/www/id.dlabs/erp/
              git checkout main | git pull
              cp .env.develop .env
              COMPOSER_ALLOW_SUPERUSER=1 composer update
              yes | php artisan migrate -n --force
              chown nginx:nginx -R ./
              service supervisord restart
            '''
            sh 'scp -P 2222 -r ./public root@192.168.112.2:/var/www/id.dlabs/erp/'
        }

        // sshagent(credentials : ['ssh-server.develop']) {
        //     sh '''
        //       ssh -p 22 -o StrictHostKeyChecking=no root@192.168.112.7 << EOF
        //       cd /var/www/id.dlabs/dietnyaman/
        //       git pull
        //       chown nginx:nginx -R ./
        //       service supervisord restart
        //     '''
        //     sh 'scp -P 22 -r ./public root@192.168.112.7:/var/www/id.dlabs/dietnyaman/'
        // }
      }
    }

    // stage("RELEASE STAGING") {
    //   when {
    //     anyOf {
    //       branch 'staging'
    //     }
    //   }
    //   steps {
    //     script {
    //       FAILED_STAGE=env.STAGE_NAME
    //     }

    //     sh label: 'Notify Approval Mattermost', script:
    //     """
    //       slack \
    //         -h ${env.MATTERMOST} \
    //         -c jenkins \
    //         -u "Jenkins" \
    //         -i :dlabs: \
    //         -C "1974D2" \
    //         -T "${env.STAGE_NAME} Need Approval! ${currentBuild.fullDisplayName}" \
    //         -m "URL: [Open](${BUILD_URL}input)"
    //     """

    //     timeout(time: 48, unit: "HOURS") {
    //         input message: "Do you want to approve the ${env.STAGE_NAME}?", ok: 'Yes'
    //     }

    //     sshagent(credentials : ['ssh-server.hosting']) {
    //         sh '''
    //           ssh -p 2222 -o StrictHostKeyChecking=no root@192.168.112.2 << EOF
    //           cd /var/www/com.dietnyaman/staging
    //           git checkout staging | git pull
    //           cp .env.staging .env
    //           COMPOSER_ALLOW_SUPERUSER=1 composer update
    //           yes | php artisan migrate -n --force
    //           chown nginx:nginx -R ./
    //           service supervisord restart
    //         '''
    //         sh 'scp -P 2222 -r ./public root@192.168.112.2:/var/www/com.dietnyaman/staging/'
    //     }

    //     sh label: 'Notify Approval Mattermost', script:
    //     """
    //       slack \
    //         -h ${env.MATTERMOST} \
    //         -c jenkins \
    //         -u "Jenkins" \
    //         -i :dlabs: \
    //         -C "1974D2" \
    //         -T "${env.STAGE_NAME} Completed!" \
    //         -m "Login Dashboard: [Open](https://staging.dietnyaman.com/login)"
    //     """
    //   }
    // }
  }

  // Post CICD Execution
  post {
    failure {
      sh label: 'notif failure', script:
      """
        slack \
          -h ${env.MATTERMOST} \
          -c jenkins \
          -u "Jenkins" \
          -i dlabs \
          -C "1974D2" \
          -T "${env.JOB_NAME} ${env.BUILD_DISPLAY_NAME}" \
          -m "Failed! at **${FAILED_STAGE}**"
      """
    }

    success {
      sh label: 'notif success', script:
      """
        slack \
          -h ${env.MATTERMOST} \
          -c jenkins \
          -u "Jenkins" \
          -i dlabs \
          -C "1974D2" \
          -T "${env.JOB_NAME} ${env.BUILD_DISPLAY_NAME}" \
          -m "Successfully! at **${FAILED_STAGE}**"
      """
    }
  }
}

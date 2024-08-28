<?php

namespace App\Http\Resources\V4;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
  public static $wrap = null;
//   {
//     "id": 668800,
//     "username": "dhutapratama",
//     "name": "Dhuta Pratama",
//     "state": "active",
//     "locked": false,
//     "avatar_url": "https://secure.gravatar.com/avatar/3b3aaa65dea32d9c2044f20cf81b51e27e86e3e42a4588a961188bf709e29f39?s=80&d=identicon",
//     "web_url": "https://gitlab.com/dhutapratama",
//     "created_at": "2016-08-17T04:28:56.528Z",
//     "bio": "",
//     "location": "",
//     "public_email": "",
//     "skype": "",
//     "linkedin": "",
//     "twitter": "",
//     "discord": "",
//     "website_url": "",
//     "organization": "",
//     "job_title": "",
//     "pronouns": "",
//     "bot": false,
//     "work_information": null,
//     "local_time": "1:56 AM",
//     "last_sign_in_at": "2024-08-19T09:37:43.807Z",
//     "confirmed_at": "2016-08-17T04:30:47.658Z",
//     "last_activity_on": "2024-08-19",
//     "email": "me@dhutapratama.com",
//     "theme_id": 7,
//     "color_scheme_id": 1,
//     "projects_limit": 100000,
//     "current_sign_in_at": "2024-08-19T18:36:00.702Z",
//     "identities": [
//     {
//     "provider": "google_oauth2",
//     "extern_uid": "106079276623562032302",
//     "saml_provider_id": null
//     }
//     ],
//     "can_create_group": true,
//     "can_create_project": true,
//     "two_factor_enabled": false,
//     "external": false,
//     "private_profile": false,
//     "commit_email": "me@dhutapratama.com",
//     "shared_runners_minutes_limit": 2000,
//     "extra_shared_runners_minutes_limit": null,
//     "scim_identities": []
//     }

  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $r): array
  {
    $user = $r->user();
    $employee = $user->employee;

    return [
      'id' => $user->id,
      'username' => $user->username,
      'name' => $employee->nama,
      'state' => 'active',
      'locaked' => 'false',
      'avatar_url' => 'https://secure.gravatar.com/avatar/f26d2001d8ddc9a89fef46e6325f5068?s=80&d=identicon',
      'web_url' => null,
      'created_at' => $user->created_at,
      'bio' => '',
      'location' => 'Malang',
      'public_email' => $user->email,
      'skype' => '',
      'linkedin' => '',
      'twitter' => '',
      'discord' => '',
      'website_url' => 'http://dlabs.id/user/' . $user->username,
      'organization' => '',
      'job_title' => 'Developer', // TODO: adjustment
      'pronouns' => '',
      'bot' => false,
      'work_information' => null,
      //   'local_time' => '1:56 AM',
      //   'last_sign_in_at' => '2024-08-19T09:37:43.807Z',
      //   'confirmed_at' => '2016-08-17T04:30:47.658Z',
      //   'last_activity_on' => '2024-08-19',
      'email' => $user->email,
      'theme_id' => 7,
      'color_scheme_id' => 1,
      'projects_limit' => 100000,
      //   'current_sign_in_at' => '2024-08-19T18:36:00.702Z',
      'can_create_group' => true,
      'can_create_project' => true,
      'two_factor_enabled' => false,
      'external' => false,
      'private_profile' => false,
      'commit_email' => $user->email,
      'shared_runners_minutes_limit' => 2000,
      'extra_shared_runners_minutes_limit' => null,
      'scim_identities' => []
    ];
  }
}

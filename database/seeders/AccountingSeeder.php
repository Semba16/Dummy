<?php

namespace Database\Seeders;

use App\Models\AccAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class AccountingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $accounts = [
      [
        'code' => '',
        'type' => 'root',
        'name' => 'Accounting',
        'placeholder' => true,
        'subs' => [
          [
            'type' => 'asset',
            'name' => 'Aset',
            'placeholder' => true,
            'subs' => [
              [
                'code' => '0',
                'name' => 'Asset Lancar',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Kas',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Kas Kecil',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Kas Bank',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Piutang Usaha',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Penyisihan Piutang Usaha',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Piutang Karyawan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Penyisihan Piutang Karyawan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Perlengkapan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Iklan Dibayar Dimuka',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Jasa Dibayar Dimuka',
                    'placeholder' => false
                  ],
                ]
              ],
              [
                'code' => '1',
                'name' => 'Investasi Jangka Panjang',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Investasi Saham',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Investasi Obligasi',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Investasi Usaha',
                    'placeholder' => false
                  ]
                ]
              ],
              [
                'code' => '2',
                'name' => 'Aset Tidak Lancar/Aset tetap',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Bangunan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Akumulasi Depresiasi Bangunan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Peralatan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Akumulasi Depresiasi Peralatan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Kendaraan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Akumulasi Depresiasi Kendaraan',
                    'placeholder' => false
                  ]
                ]
              ],
              [
                'code' => '3',
                'name' => 'Aset tetap tidak berwujud',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Hak Paten',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Hak Cipta',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Merk Dagang',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Goodwill',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Franchise',
                    'placeholder' => false
                  ]
                ]
              ],
              [
                'code' => '4',
                'name' => 'Aset lain-lain',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Mesin Yang Tidak Digunakan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban yang DiTangguhkan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Piutang Kepada Pemegang Saham',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Emisi Saham',
                    'placeholder' => false
                  ]
                ]
              ]
            ]
          ],
          [
            'type' => 'liability',
            'name' => 'Kewajiban',
            'placeholder' => true,
            'subs' => [
              [
                'code' => '0',
                'name' => 'Kewajiban Lancar',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Hutang usaha',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Hutang wesel',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban yang Masih Harus Dibayar',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Hutang Gaji',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Hutang Sewa Gedung',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Hutang Pajak Penghasilan',
                    'placeholder' => false
                  ]
                ]
              ],
              [
                'code' => '1',
                'name' => 'Kewajiban Jangka Panjang',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Hutang Hipotek',
                    'placeholder' => false,
                  ],
                  [
                    'name' => 'Hutang Obligasi',
                    'placeholder' => false,
                  ],
                  [
                    'name' => 'Hutang Gadai',
                    'placeholder' => false,
                  ]
                ]
              ]
            ]
          ],
          [
            'type' => 'equity',
            'name' => 'Ekuitas',
            'placeholder' => true,
            'subs' => [
              [
                'code' => '0',
                'name' => 'Ekuitas',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Modal/Ekuitas Pemilik',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Prive',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Modal Aset Tetap',
                    'placeholder' => false
                  ]
                ]
              ]
            ]
          ],
          [
            'type' => 'income',
            'name' => 'Pendapatan',
            'placeholder' => true,
            'subs' => [
              [
                'code' => '0',
                'name' => 'Pendapatan Usaha',
                'placeholder' => false,
                'subs' => []
              ],
              [
                'code' => '1',
                'name' => 'Pendapatan Diluar Usaha',
                'placeholder' => false,
                'subs' => []
              ]
            ]
          ],
          [
            'type' => 'expense',
            'name' => 'Beban',
            'placeholder' => true,
            'subs' => [
              [
                'code' => '0',
                'name' => 'Beban',
                'placeholder' => true,
                'subs' => [
                  [
                    'name' => 'Beban Gaji Karyawan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Meeting',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Listrik',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Penyesuaian Piutang',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Perlengkapan Kantor',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Administrasi Kantor',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Internet',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Depresiasi Peralatan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Depresiasi Bangunan',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Bunga',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Klaim Reimbust',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Administrasi Bank',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Biaya Transportasi',
                    'placeholder' => false
                  ],
                  [
                    'name' => 'Beban Lain-Lain',
                    'placeholder' => false
                  ]
                ]
              ]
            ]
          ]
        ]
      ]
    ];

    $this->process($accounts);
  }

  private function process(array $accounts, $parent = null, $depth = 1)
  {
    foreach ($accounts as $index => $account) {
      $this->insert(collect($account), $parent, $index, $depth);
    }
  }

  /**
   * Insert data into database
   *
   * @param Collection $account
   * @param [type] $parent
   * @return void
   */
  private function insert(Collection $account, $parent, $index = 0, $depth)
  {
    if ($parent) {
      if (isset($account['code'])) {
        $code = $account['code'];
      } else {
        $leadingZeros = ($depth <= 2) ? 1 : 2;
        $pattern = "%0{$leadingZeros}.0f";
        $code = sprintf($pattern, ($index + 1));
      }

      $insert = [
        'parent_id' => $parent->id,
        'code' => $code,
        'type' => $account['type'] ?? $parent->type,
        'name' => $account['name'],
        'description' => $account['name'],
        'placeholder' => $account['placeholder'],
      ];
    } else {
      $insert = $account->only(['code', 'type', 'name', 'placeholder'])->toArray();
      $insert['description'] = $insert['name'];
    }

    $parent = AccAccount::create($insert);
    if (isset($account['subs'])) {
      $this->process($account['subs'], $parent, $depth + 1);
    }
  }
}

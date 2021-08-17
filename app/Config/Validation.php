<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $mahasiswa = [
        'NIM'     => 'required',
        'NAMA_MAHASISWA'     => 'required',
		'PASSWORD_MAHASISWA'     => 'required'
    ];
     
    public $mahasiswa_errors = [
        'NIM' => [
            'required'    => 'NIM wajib diisi.',
        ],
        'NAMA_MAHASISWA'    => [
            'required' => 'NAMA wajib diisi.',
		],
		'PASSWORD_MAHASISWA'    => [
            'required' => 'PASSWORD wajib diisi.'
        ]
    ];


	public $dosen = [
        'NIP'     => 'required',
        'NAMA_DOSEN'     => 'required',
		'PASSWORD_DOSEN'     => 'required'
    ];
     
    public $dosen_errors = [
        'NIP' => [
            'required'    => 'NIP wajib diisi.',
        ],
        'NAMA_DOSEN'    => [
            'required' => 'NAMA wajib diisi.',
		],
		'PASSWORD_DOSEN'    => [
            'required' => 'PASSWORD wajib diisi.'
        ]
    ];

	public $authlogin = [
		'NAMA_MAHASISWA'         => 'required',
		'PASSWORD_MAHASISWA'      => 'required'
	];
	 
	public $authlogin_errors = [
		'NAMA_MAHASISWA'=> [
			'required'  => 'Nama wajib diisi.',
		],
		'PASSWORD_MAHASISWA'=> [
			'required'  => 'Password wajib diisi.'
		]
	];


	public $kerjapraktek = [
		'NIM_KP'      	=> 'required',
		'NAMA_MHS_KP'   => 'required',
		'JUDUL_KP'      => 'required',
		'TEMPAT_KP'     => 'required',
		'TANGGAL_KP'    => 'required',
		'DOSPEM_KP'     => 'required'
	];

	public $kerjapraktek_errors = [
		'NIM_KP'=> [
			'required'  => 'NIM wajib diisi.'
		],
		'NAMA_MAHASISWA_KP'=> [
			'required'  => 'NAMA wajib diisi.'
		],
		'JUDUL_KP'=> [
			'required'  => 'JUDUL wajib diisi.'
		],
		'TEMPAT_KP'=> [
			'required'  => 'TEMPAT wajib diisi.'
		],
		'TANGGAL_KP'=> [
			'required'  => 'TANGGAL wajib diisi.'
		],
		'DOSPEM_KP'=> [
			'required'  => 'DOSPEM wajib diisi.'
		],
	
	];

	public $nilai = [
		'ID_KP'      	=> 'required',
		'NIM_NILAI'      	=> 'required',
		'NAMA_NILAI'  	 => 'required',
		'JUDUL_KP_NILAI'      => 'required',
		'TEMPAT_KP_NILAI'     => 'required',
		'TANGGAL_NILAI'    => 'required',
		'DOSPEM'     => 'required'
	];

	public $nilai_errors = [
		'ID_KP'=> [
			'required'  => 'ID KP wajib diisi.'
		],
		'NIM_NILAI'=> [
			'required'  => 'NIM wajib diisi.'
		],
		'NAMA_NILAI'=> [
			'required'  => 'NAMA wajib diisi.'
		],
		'JUDUL_KP_NILAI'=> [
			'required'  => 'JUDUL wajib diisi.'
		],
		'TEMPAT_KP_NILAI'=> [
			'required'  => 'TEMPAT wajib diisi.'
		],
		'TANGGAL_NILAI'=> [
			'required'  => 'TANGGAL wajib diisi.'
		],
		'DOSPEM'=> [
			'required'  => 'DOSPEM wajib diisi.'
		],
	
	];

	public $bimbingan = [
		'ID_KP'      	=> 'required',
		'URAIAN'      	=> 'required',
	];

	public $bimbingan_errors = [
		'ID_KP'=> [
			'required'  => 'ID KP wajib diisi.'
		],
		'URAIAN'=> [
			'required'  => 'URAIAN wajib diisi.'
		],
	
	];

}

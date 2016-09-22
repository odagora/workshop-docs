<?php

//list of matrices names
$names= array(
	'1' => 'A - EXTERIOR',
	'2' => 'B - INTERIOR',
	'3' => 'C - INTERIOR',
	'4' => 'D - MOTOR',
	'5' => 'E - ELECTRICIDAD',
	'6' => 'F - SUSPENSION Y DIRECCION',
	'7' => 'G - CAJA Y TRANSMISION',
	'8' => 'H - OTROS' 
	);

//list of options
$loptions= array(
	'1' => 'B',
	'2' => 'R',
	'3' => 'M',
	'4' => 'N/A');

//list of matrices info
$list = array(
	'1' => array(
				'1'	=> 'Latonería',
				'2' =>	'Pintura',				
				'3' =>	'Chasis',				
				'4' =>	'Antena',				
				'5' =>	'Vidrios',				
				'6' =>	'Espejos',				
				'7' =>	'Limpiabrisas',				
				'8' =>	'Persiana',				
				'9' =>	'Farolas',				
				'10' =>	'Cocuyos direccionales',				
				'11' =>	'Cocuyos bomper',				
				'12' =>	'Cocuyos guardafangos',				
				'13' =>	'Emblemas',				
				'14' =>	'Chapas puertas',				
				'15' =>	'Manijas puertas',				
				'16' =>	'Tapa gasolina',				
				'17' =>	'Bocelería',				
				'18' =>	'Rines',				
				'19' =>	'Copas',				
				'20' =>	'Llantas',				
				'21' =>	'Bomper delantero',				
				'22' =>	'Punteras bomper delantero',				
				'23' =>	'Chapa baúl',				
				'24' =>	'Bomper trasero',				
				'25' =>	'Punteras bomper trasero',				
				'26' =>	'Luz placa',				
				'27' =>	'Stops'								
			),
	'2' => array(
				'1' => 'Espejo retrovisor',				
				'2' => 'Parasoles',				
				'3' => 'Cinturones de seguridad',				
				'4' => 'Manijas elevavidrios',				
				'5' => 'Manijas puertas',				
				'6' => 'Descansabrazos',				
				'7' => 'Forros',				
				'8' => 'Tapicería',				
				'9' => 'Ceniceros',				
				'10' => 'Luz interior',				
				'11' => 'Radio',				
				'12' => 'Parlantes',				
				'13' => 'Encendedor',				
				'14' => 'Ventilador',				
				'15' => 'Aire Acondicionado',				
				'16' => 'Calefacción',
				'17' => 'Tapa guantera',				
				'18' => 'Desempañador trasero',				
				'19' => 'Luz tablero',				
				'20' => 'Indicador de gasolina',				
				'21' => 'Indicador de temperatura',				
				'22' => 'Indicador presión de aceite'
			),
	'3' => array(
				'1' => 'Indicador freno de mano',				
				'2' => 'Velocímetro',				
				'3' => 'Tacómetro',				
				'4' => 'Odómetro parcial',				
				'5' => 'Odómetro total',				
				'6' => 'Reloj',				
				'7' => 'Rejillas tablero',				
				'8' => 'Panel tablero',				
				'9' => 'Conmutador de luces',				
				'10' => 'Freno de mano',				
				'11' => 'Tapetes',				
				'12' => 'Alfombra',				
				'13' => 'Apoyacabezas'

			),
	'4' => array(
				'1' => 'Varilla apertura capot',				
				'2' => 'Amortiguadores capot',				
				'3' => 'Sistema de refrigeración',				
				'4' => 'Tapa de aceite',				
				'5' => 'Tapa frasco lavavidrios',				
				'6' => 'Tapa recipiente hidráulico',				
				'7' => 'Varilla nivel de aceite',				
				'8' => 'Sistema de alimentación',				
				'9' => 'Compresión de cilindros',				
				'10' => 'Sincronización',				
				'11' => 'Nivel de aceite',				
				'12' => 'Fugas de aceite',				
				'13' => 'Ruidos de motor',				
				'14' => 'Sistema de escape',				
				'15' => 'Tanque de combustible'

			),
	'5' => array(
				'1'	=> 'Batería',				
				'2'	=> 'Motor de arranque',				
				'3'	=> 'Alternador',				
				'4'	=> 'Luces medias',				
				'5'	=> 'Luces plenas',				
				'6'	=> 'Luces direcionales',				
				'7'	=> 'Luces de parqueo',
				'8'	=> 'Luces de reverso',				
				'9'	=> 'Luces de freno'
			),
	'6' => array(
				'1' => 'Amortiguadores delanteros',				
				'2' => 'Espirales delanteros',				
				'3' => 'Rótulas superiores',				
				'4' => 'Rótulas inferiores',				
				'5' => 'Terminales de dirección',				
				'6' => 'Brazos axiales',				
				'7' => 'Muñecos barra estabilizadora',				
				'8' => 'Tijeras superiores',				
				'9' => 'Tijeras inferiores',				
				'10' => 'Bujes de tijera',				
				'11' => 'Bujes barra estabilizadora',				
				'12' => 'Caja de dirección',				
				'13' => 'Guardapolvos caja dirección',				
				'14' => 'Discos de freno',				
				'15' => 'Pastillas de freno delanteras',				
				'16' => 'Pastillas de freno traseras',				
				'17' => 'Rodamientos delanteros',				
				'18' => 'Rodamientos traseros',				
				'19' => 'Amortiguadores traseros',				
				'20' => 'Muelles',				
				'21' => 'Bujes de muelles',				
				'22' => 'Rodamientos traseros',				
				'23' => 'Espirales traseros',				
				'24' => 'Bandas de freno'
			),
	'7' => array(
				'1' => 'Transmisión',				
				'2' => 'Cárdan',				
				'3' => 'Crucetas cárdan',				
				'4' => 'Ejes delanteros',				
				'5' => 'Control de cambios',				
				'6' => 'Caja de velocidades',				
				'7' => 'Soportes de caja',				
				'8' => 'Kit de embrague',				
				'9' => 'Guaya de embrague',				
				'10' => 'Fugas de aceite'

			),
	'8' => array(
				'1' => 'Gato',				
				'2' => 'Copa de seguridad',				
				'3' => 'Llanta de repuesto',				
				'4' => 'Alarma',				
				'5' => 'Exploradoras'
			)
	);

//list of radio button matrices names
$elNames = array(
	'1' => 'matrix_1',
	'2' => 'matrix_2',
	'3' => 'matrix_3',
	'4' => 'matrix_4',
	'5' => 'matrix_5',
	'6' => 'matrix_6',
	'7' => 'matrix_7',
	'8' => 'matrix_8'
	);

//list of matrices errors names
$errorNames = array(
	'1' => @$matrix1Err,
	'2' => @$matrix2Err,
	'3' => @$matrix3Err,
	'4' => @$matrix4Err,
	'5' => @$matrix5Err,
	'6' => @$matrix6Err,
	'7' => @$matrix7Err,
	'8' => @$matrix8Err
	);

//list of comments names
$comNames = array(
	'1' => 'comment1',
	'2' => 'comment2',
	'3' => 'comment3',
	'4' => 'comment4',
	'5' => 'comment5',
	'6' => 'comment6',
	'7' => 'comment7',
	'8' => 'comment8',
	);

//List of comments variables
$comVariables = array(
	'1' => @$comment1,
	'2' => @$comment2,
	'3' => @$comment3,
	'4' => @$comment4,
	'5' => @$comment5,
	'6' => @$comment6,
	'7' => @$comment7,
	'8' => @$comment8,
	);

//list of comments errors names
$errorNames1 = array(
	'1' => @$comment1Err,
	'2' => @$comment2Err,
	'3' => @$comment3Err,
	'4' => @$comment4Err,
	'5' => @$comment5Err,
	'6' => @$comment6Err,
	'7' => @$comment7Err,
	'8' => @$comment8Err
	);

//list of matrix elements names
$matrixNames = array(
	'1' => array(
				'1' => 'm1_el1',
				'2' => 'm1_el2',
				'3' => 'm1_el3',
				'4' => 'm1_el4',
				'5' => 'm1_el5',
				'6' => 'm1_el6',
				'7' => 'm1_el7',
				'8' => 'm1_el8',
				'9' => 'm1_el9',
				'10' => 'm1_el10',
				'11' => 'm1_el11',
				'12' => 'm1_el12',
				'13' => 'm1_el13',
				'14' => 'm1_el14',
				'15' => 'm1_el15',
				'16' => 'm1_el16',
				'17' => 'm1_el17',
				'18' => 'm1_el18',
				'19' => 'm1_el19',
				'20' => 'm1_el20',
				'21' => 'm1_el21',
				'22' => 'm1_el22',
				'23' => 'm1_el23',
				'24' => 'm1_el24',
				'25' => 'm1_el25',
				'26' => 'm1_el26',
				'27' => 'm1_el27'
		),
	'2' => array(
				'1' => 'm2_el1',
				'2' => 'm2_el2',
				'3' => 'm2_el3',
				'4' => 'm2_el4',
				'5' => 'm2_el5',
				'6' => 'm2_el6',
				'7' => 'm2_el7',
				'8' => 'm2_el8',
				'9' => 'm2_el9',
				'10' => 'm2_el10',
				'11' => 'm2_el11',
				'12' => 'm2_el12',
				'13' => 'm2_el13',
				'14' => 'm2_el14',
				'15' => 'm2_el15',
				'16' => 'm2_el16',
				'17' => 'm2_el17',
				'18' => 'm2_el18',
				'19' => 'm2_el19',
				'20' => 'm2_el20',
				'21' => 'm2_el21',
				'22' => 'm2_el22'
		),
	'3' => array(
				'1' => 'm3_el1',
				'2' => 'm3_el2',
				'3' => 'm3_el3',
				'4' => 'm3_el4',
				'5' => 'm3_el5',
				'6' => 'm3_el6',
				'7' => 'm3_el7',
				'8' => 'm3_el8',
				'9' => 'm3_el9',
				'10' => 'm3_el10',
				'11' => 'm3_el11',
				'12' => 'm3_el12',
				'13' => 'm3_el13'
		),
	'4' => array(
				'1' => 'm4_el1',
				'2' => 'm4_el2',
				'3' => 'm4_el3',
				'4' => 'm4_el4',
				'5' => 'm4_el5',
				'6' => 'm4_el6',
				'7' => 'm4_el7',
				'8' => 'm4_el8',
				'9' => 'm4_el9',
				'10' => 'm4_el10',
				'11' => 'm4_el11',
				'12' => 'm4_el12',
				'13' => 'm4_el13',
				'14' => 'm4_el14',
				'15' => 'm4_el15'
		),
	'5' => array(
				'1' => 'm5_el1',
				'2' => 'm5_el2',
				'3' => 'm5_el3',
				'4' => 'm5_el4',
				'5' => 'm5_el5',
				'6' => 'm5_el6',
				'7' => 'm5_el7',
				'8' => 'm5_el8',
				'9' => 'm5_el9'
		),
	'6' => array(
				'1' => 'm6_el1',
				'2' => 'm6_el2',
				'3' => 'm6_el3',
				'4' => 'm6_el4',
				'5' => 'm6_el5',
				'6' => 'm6_el6',
				'7' => 'm6_el7',
				'8' => 'm6_el8',
				'9' => 'm6_el9',
				'10' => 'm6_el10',
				'11' => 'm6_el11',
				'12' => 'm6_el12',
				'13' => 'm6_el13',
				'14' => 'm6_el14',
				'15' => 'm6_el15',
				'16' => 'm6_el16',
				'17' => 'm6_el17',
				'18' => 'm6_el18',
				'19' => 'm6_el19',
				'20' => 'm6_el20',
				'21' => 'm6_el21',
				'22' => 'm6_el22',
				'23' => 'm6_el23',
				'24' => 'm6_el24'
		),
	'7' => array(
				'1' => 'm7_el1',
				'2' => 'm7_el2',
				'3' => 'm7_el3',
				'4' => 'm7_el4',
				'5' => 'm7_el5',
				'6' => 'm7_el6',
				'7' => 'm7_el7',
				'8' => 'm7_el8',
				'9' => 'm7_el9',
				'10' => 'm7_el10'
		),
	'8' => array(
				'1' => 'm8_el1',
				'2' => 'm8_el2',
				'3' => 'm8_el3',
				'4' => 'm8_el4',
				'5' => 'm8_el5'
		)
	);

?>
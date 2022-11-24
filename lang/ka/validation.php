<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'between' => [
		'string' => ':attribute უნდა იყოს არანაკლებ :min და არაუმეტეს :max სიმბოლოს შორის.',
	],
	'current_password' => 'პაროლი არასწორია.',
	'email'            => ':attribute უნდა იყოს ვალიდური.',
	'exists'           => ':attribute არაა ვალიდური.',
	'image'            => 'ატვირთული ფაილი არაა :attribute.',
	'in'               => ':attribute არასწორია.',
	'lt'               => [
		'string' => ':attribute სიგრძე უნდა იყოს :value სიმბოლოზე ნაკლები.',
	],
	'max' => [
		'string' => ':attribute უნდა იყოს არაუმეტეს :max სიმბოლოსი.',
	],

	'min' => [
		'string' => ':attribute უნდა იყოს არანაკლებ :max სიმბოლოსი.',
	],
	'min_digits' => ':attribute - ის სიგრძე უნდა იყოს სულ მცირე :max სიმბოლო.',

	'not_regex' => ':attribute - ის ფორმატი არასწორია.',

	'required' => ':attribute სავალდებულო ველია.',
	'unique'   => ':attribute უკვე გამოყენებულია.',
	'uploaded' => ':attribute არ აიტვირთა.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [
		'email'     => 'იმეილი',
		'password'  => 'პაროლი',
		'title'     => 'სათაური',
		'quote'     => 'ფრაზა',
		'thumbnail' => 'სურათი',
	],
];

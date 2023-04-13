%extends("layout")

%block("title", "The page title")

%block("content")
	{## comment ##}

	%auth
		// code
	%endauth

	%guest
		// code
	%endguest

	%isset($is_service_side)
		// code
	%endisset

	%isset($is_service_side)
		// Show the code when the variable $is_service_side
		// is define
	%endisset

	%if(true)
		// Do Something
	%endif

	%loop($users as $user)
		{{ $user->name }}
		%jump
		%stop
	%empty

	%endloop

	%if (true)
		// Do Something
	%endif

	%while(true)
		// Do Somethink
	%endwhile

	%for($i = 0; $i < 0; $i++)
		// Do Somethink
	%endfor

	%unless(false)
		// Do Somethink
	%endunless

	%verbatim
		// The code here cannot be parse by
		// tempate lexer
	%endverbatim

	%env("production")
		// The code here should be show on
		// production only
	%endenv

	%empty($array)
		The array is empty
	%endempty

	%production
		// Alias of %env('production')
	%endproduction

	%include("the-template-partials", $data)
	%includeif($name == 'tintin', 'the-template-partials', $data)
	%includewhen($name == 'tintin', 'the-template-partials', $data)

	%flash("message")
%endblock

%macro("field", string $type, string $name, string $value = null)

%endmacro

%import("macro")

%macro("field", string $type, string $name, ?string $value = null)
    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"/>
%endmacro

%extends("layout")

%block("title", "The page title")

%block("content")
	{## comment ##}

	%auth
		// code
    %else
        Do something else
	%endauth

	%guest
		// code
    %else
        Do something else
	%endguest

	%isset($is_service_side)
		// code
    %else
        Do something else
	%endisset

	%isset($is_service_side)
		// Show the code when the variable $is_service_side
		// is define
    %else
        Do something else
	%endisset

	%if(true)
		// Do something
	%endif

	%loop($users as $user)
		{{ $user->name }}
		%jump
		%stop
	%endloop

	%if (true)
		// Do something
    %elif(false)
		// Do something
    %else
		// Do something
	%endif

	%while(true)
		// Do something
	%endwhile

	%for($i = 0; $i < 0; $i++)
		// Do something
	%endfor

	%unless(false)
		// Do something
    %else
        Do something else
	%endunless

	%verbatim
		// The code here cannot be parse by
		// tempate lexer
	%endverbatim

	%env("production")
		// The code here should be show on
		// production only
    %else
        Do something else
	%endenv

	%empty($array)
		The array is empty
    %else
        Do something else
	%endempty

	%notempty($array)
		The array is notempty
    %else
        Do something else
	%endnotempty

	%production
		// Alias of %env('production')
    %else
        Do something else
	%endproduction

	%include("the-template-partials", $data)
	%includeIf('include-if-the-template-partials-exist', $data)
	%includeWhen($name == 'tintin', 'the-template-partials', $data)

    %hasflash("error")
		<div class="alert alert-danger">
			%flash("error")
		</div>
    %endhasflash
%endblock

%service("user_service", "App\Service\UserService")

%loop($user_service->fetchAll() as $user)
	{{ $user->name }}
%endloop

# Bow Tintin

Bow Tintin snippets and syntax highlighting support for Visual Studio Code.

## User Settings

Open `Preferences` -> `Settings`

```json
"emmet.triggerExpansionOnTab": true,
"tintin.format.enable": true,
```

Specific settings for Tintin language

```json
"[tintin]": {
    "editor.autoClosingBrackets": "always"
},
```

## Features

- Tintin syntax highlight
- Tintin snippets
- Emmet works in the Tintin template
- Tintin formatting

## Tintin Syntax Highlight

- Auto detected with `.tintin.php` extension
- Manually switch language mode to `tintin` (`Ctrl + K, M` or `⌘ + K, M`)

## Bow Tintin Snippets

| Trigger             | Snippet                                   |
| ------------------- | ----------------------------------------- |
| t:extends           | #extends                                  |
| t:block             | #block ... #endblock                      |
| t:include           | #include                                  |
| t:inject            | #inject                                   |
| t:if                | #if...#endif                              |
| t:if-else           | #if...#else...#endif                      |
| t:unless            | #unless                                   |
| t:while             | #while...#endwhile                        |
| t:for               | #for...#endfor                            |
| t:loop              | #loop...#endloop                          |
| t:comment           | #for...#endcomment                        |
| t:echo              | {{ '' }}                                  |
| t:jump              | #jump()                                   |
| t:stop              | #stop()                                   |

## Introduction

Tintin is a PHP template that wants to be very simple and extensible. It can be used in any PHP project.

### Data display

You can display the contents of the name variable as follows:

```c
Hello, {{ $name }}.
```

Of course, you are not limited to displaying the content of the variables passed to the view. You can also echo the results of any PHP function. In fact, you can insert any PHP code into an echo statement:

```html
Hello, {{ strtoupper($name) }}.
```

> Tintin instructions `{{}}` are automatically sent via the PHP function `htmlspecialchars` to prevent XSS attacks.

#### Display of non-escaped data

By default, Tintin `{{}}` instructions are automatically sent via the PHP function `htmlspecialchars` to prevent XSS attacks. If you do not want your data to be protected, you can use the following syntax:

```html
Hello, {{{ $name }}}.
```

### Add a comment

This `{# comments #}` clause adds a comment to your `tintin` code.

### %if / %elseif or %elif / %else

These are the clauses which make it possible to establish conditional branches as in most programming languages.

```c
%if ($name == 'tintin')
  {{ $name }}
%elseif ($name == 'template')
  {{ $name }}
%else
  {{ $name }}
%endif
```

> You can use `%elif` instead of `%elseif`.

### #unless

Small specificity, the `#unless` meanwhile, it allows to make a reverse condition of `#if`.
To put it simply, here is an example:

```t
%unless ($name == 'tintin')
# Equals to
%if (!($name == 'tintin'))
```

### %loop / %for / %while

Often you may have to make lists or repetitions on items. For example, view all users of your platform.

#### Using %loop

This clause does exactly the `foreach` action.

```t
%loop ($names as $name)
  Hello {{ $name }}
%endloop
```

This clause can also be paired with any other clause such as `#if`. A quick example.

```t
%loop ($names as $name)
  %if ($name == 'tintin')
    Hello {{ $name }}
    %stop
  %endif
%endloop
```

You may have noticed the `%stop` it allows to stop the execution of the loop. There is also his spouse `%jump`, him parcontre allows to stop the execution at his level and launch execution of the next round of the loop.

#### Syntax sugars %jump and %stop

Often the developer is made to make stop conditions of the `%loop` like this:

```t
%loop ($names as $name)
  %if ($name == 'tintin')
    %stop
    // Or
    %jump
  %endif
%endloop
```

With syntactic sugars, we can reduce the code like this:

```t
%loop ($names as $name)
  %stop($name == 'tintin')
  // Or
  %jump($name == 'tintin')
%endloop
```

#### Using $for

This clause does exactly the `for` action.

```t
%for ($i = 0; $i < 10; $i++)
 // ..
%endfor
```

#### Using #while

This clause does exactly the `while` action.

```t
%while ($name != 'tintin')
 // ..
%endwhile
```

### Include of file

Often when you are developing your code, you have to subdivide the views of your application to be more flexible and write less code.

`#include` allows to include another template file in another.

```t
%include('filename', data)
```

#### Example of inclusion

Consider the following `hello.tintin.php` file:

```t
Hello {{ $name }}
```

Use:

```t
%include('hello', ['name' => 'Tintin'])
// => Hello Tintin
```

## Inherit with #extends, #block and #inject

Like any good template system **tintin** supports code sharing between files. This makes your code flexible and maintainable.

Consider the following **tintin** code:

```t
# The `layout.tintin.php` file
<!DOCTYPE html>
<html>
<head>
  <title>Hello, world</title>
</head>
<body>
  <h1>Page header</h1>
  <div id="page-content">
    %inject('content')
  </div>
  <p>Page footer</p>
</body>
</html>
```

And also, we have another file that inherits the code of the file `layout.tintin.php`

```t
// the file is named `content.tintin.php`
%extends('layout')

%block('content')
  <p>This is the page content</p>
%endblock
```

### Explication

The `content.tintin.php` file will inherit the code from` layout.tintin.php` and if you mark it well, in the file `layout.tintin.php` we have the clause `%inject` which has as parameter the name of `content.tintin.php` `block` which is `content`. Which means that the content of `%block` `content` will be replaced by `%inject`. Which will give in the end this:

```html
<!DOCTYPE html>
<html>
<head>
  <title>Hello, world</title>
</head>
<body>
  <h1>Page header</h1>
  <div id="page-content">
    <p>This is the page content</p>
  </div>
  <p>Page footer</p>
</body>
</html>
```

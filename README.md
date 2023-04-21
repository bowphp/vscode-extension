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
****
| Trigger             | Snippet                                   |
| ------------------- | ----------------------------------------- |
| t:comment           | {##  ##}                                  |
| t:echo              | {{ $name }}                               |
| t:recho             | {{{ $name }}}                             |
| t:extends           | %extends                                  |
| t:import            | %import                                   |
| t:block             | %block ... %endblock                      |
| t:include           | %include                                  |
| t:includeIf         | %includeIf                                |
| t:includeWhen       | %includeWhen                              |
| t:inject            | %inject                                   |
| t:if                | %if...%endif                              |
| t:if-else           | %if...%else...%endif                      |
| t:if-elif           | %if...%elseif..%else...%endif             |
| t:unless            | %unless                                   |
| t:while             | %while...%endwhile                        |
| t:for               | %for...%endfor                            |
| t:loop              | %loop...%endloop                          |
| t:jump              | %jump()                                   |
| t:stop              | %stop()                                   |
| t:csrf              | %csrf                                     |
| t:method            | %method                                   |
| t:service           | %service                                  |
| t:class             | %class                                    |
| t:flash             | %flash()                                  |
| t:empty             | %empty...%endempty                        |
| t:notempty          | %notempty...%endnotempty                  |
| t:verbatim          | %verbatim...%endverbatim                  |
| t:hasflash          | %hasflash...%endhasflash                  |
| t:macro             | %macro...%endmacro                        |
| t:auth              | %auth...%endauth                          |
| t:guest             | %guest...%endguest                        |
| t:env               | %env...%endenv                            |
| t:production        | %production...%endproduction              |
| t:isset             | %isset...%endisset                        |

[Documentation](https:/github.com/bowphp/tintin)

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

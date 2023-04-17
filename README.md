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
| t:comment           | {##  ##}                                  |
| t:echo              | {{ '' }}                                  |
| t:jump              | #jump()                                   |
| t:stop              | #stop()                                   |

[Documentation](https:/github.com/bowphp/tintin);

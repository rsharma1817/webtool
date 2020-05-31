# Python Library `globalfn`

### Retrieves Transcript
`full_text(lang)` retrieves all the IDs and the text of sentences given the language.

```
from globalfn.full_text import full_text

print(full_text("de"))
```


### Retrieves Alignments



### Retrieves Annotations
`all_annotations(lang)` retrieves all the annotations associated with
the TED Talk transcript of language `lang`
```
from globalfn.annotations import all_annotations

print(all_annotations("de"))
```

`annotation(sent_ID)` retrieves the annotation associated with the sentence ID.
```
from globalfn.annotations import annotation

print(annotation(1010))
```
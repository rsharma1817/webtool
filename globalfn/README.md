# Python Library `globalfn`

### Retrieves Transcript
`full_text(lang)` retrieves all the IDs and the text of sentences given the language.

```
from globalfn.full_text import full_text

print(full_text("de"))
```


### Retrieves Alignments
There are four general types of alignments:
1. one-to-one: {1010: \[1819\]}
2. many-to-one: {1070: \[1882\], 1071: \[1882\], 1072: \[1882\]}
3. one-to-many: {1065, \[1876, 1877\]}
4. many-to-many: {(1066, 1067): \[1878, 1879\]}

`all_alignments(aligned_lang)` retrieves the alignments between two languages.

It returns two dictionaries (such as EN to DE alignment and DE to EN alignment),
where in each dictionary, the the key is a sentence ID or a tuple, and the value is a list of aligned IDs.

Returns None if no alignment is found.

```
from globalfn.alignments import all_alignments

print(all_alignments('en-se'))
```


`aligned_with(ID, to_lang)` retrieves the alignments (in the specified to_lang) with the sentence ID.
Specifically,

It returns a key-value pair where the key is the ID or a tuple, and the value is a list of aligned IDs.

Returns (ID, None) if no alignment is found.
```
from globalfn.alignments import aligned_with

print(aligned_with(1100, 'se'))
```


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

The annotation is structured as the class `Annotation`:
```
class Annotation:
    def __init__(self, frameName, frameID, luName, luID, lu_idx, fe_idx, annoID, text=''):
        self.frameName = frameName
        self.frameID = frameID
        self.luName = luName
        self.luID = luID
        self.lu_idx = list(lu_idx)  # [(start_LU, end_LU, id), ...]
        self.fe_idx = list(fe_idx)  # [(start, end, feName, fe_id), ...]
        self.annoID = annoID
        self.text = text
```
# Python Library `globalfn`

### Retrieves Transcript
`globalfn.full_text.full_text(lang)`

**Purpose**: retrieves all the IDs and the text of sentences given the language.

**Output**: `[(1275, 'Guten Morgen.'), (1276, 'Wie geht es Ihnen?'), ...]`

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

`globalfn.alignments.all_alignments(aligned_lang)`

**Purpose**: Retrieves the alignments between two languages. Returns a dictionary (such as EN to DE alignment) where the the key is a sentence ID or a tuple, and the value is a list of aligned IDs. Returns None if no alignment is found.

**Output**: `defaultdict(<class 'list'>, {1008: [1817], 1009: [1818], ...`

```
from globalfn.alignments import all_alignments

print(all_alignments('en-se'))
```


`globalfn.alignments.aligned_with(ID, to_lang)`

**Purpose**: Retrieves the alignments (in the specified to_lang) with the sentence ID. Returns a tuple where the first item is the source ID (or tuple), and the second item is a list of aligned sentence IDs. Returns (ID, None) if no alignment is found.

**Output**: `(1010, [1819])`
```
from globalfn.alignments import aligned_with

print(aligned_with(1100, 'se'))
```


### Retrieves Annotations
class `Annotation`

```
@dataclass
class Annotation:
    frameName: str
    frameID: int
    luName: str
    luID: int
    lu_idx: list  # [(start_LU_idx, end_LU_idx [exclusive of space], id), ...]
    fe_idx: list  # [(start_FE_idx, end_FE_idx [exclusive of space], feName, id), ...]
    annoID: int
    text: str = ''

    # tokenized by flair
    tokenized_text: str = ''
    tokenized_lu_idx: list = field(default_factory=list)  # [(token_idx, LU), ...]
    tokenized_frame_idx: list = field(default_factory=list)  # [(token_idx, frame), ...]
    tokenized_fe_idx: list = field(default_factory=list)  # [(token_idx, FE), ...]
```


`globalfn.annotations.all_annotations(lang)`

**Purpose**: Retrieves all the annotations associated with the TED Talk transcript of language `lang`

**Output**: `defaultdict(<class 'list'>, {1275: [Annotation, Annotation],...})`

```
from globalfn.annotations import all_annotations

print(all_annotations("de"))
```

`globalfn.annotations.annotation(sent_ID)`

**Purpose**: Retrieves the annotation associated with the sentence ID.

**Output**: `Annotation`

```
from globalfn.annotations import annotation

print(annotation(1010))
```
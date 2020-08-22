# Python Library `globalfn`

## Installation
- Python 3.7+
- lxml>=4.3.1
- dill>=0.3.1.1
- flair>=0.4.5
```
pip3 install -r requirements.txt
```

## Use Cases
### Demo
![Demo](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/assets/demo_globalfn_final.gif)

### 1. Retrieves Transcripts
Codes:
1. `globalfn.full_text.full_text(lang)`

    **Purpose**: retrieves all the IDs and the text of sentences given the language. The languages supported are `de`, `el`, `en`, `fr`, `hi`, `jp`, `pt`, `se`, `ur`.

    **Output**: `[(1275, 'Guten Morgen.'), (1276, 'Wie geht es Ihnen?'), ...]`

    ```
    from globalfn.full_text import full_text

    print(full_text("de"))
    ```


### 2. Retrieves Alignments
There are four general types of alignments:
1. one-to-one: {1010: \[1819\]}
2. many-to-one: {1070: \[1882\], 1071: \[1882\], 1072: \[1882\]}
3. one-to-many: {1065, \[1876, 1877\]}
4. many-to-many: {(1066, 1067): \[1878, 1879\]}

The alignments are created manually and can be found on the Google Sheet [TED Corpus Sentence Alignment GSoC](https://docs.google.com/spreadsheets/d/1Hva4w8WdMnU-09n4LxtjGVsC6_fZbuSMfYZwIOXRXaU/edit#gid=0).

Codes:
1. `globalfn.alignments.all_alignments(aligned_lang)`

    **Purpose**: Retrieves the alignments between two languages. Returns a dictionary (such as EN to DE alignment) where the the key is a sentence ID or a tuple, and the value is a list of aligned IDs. Returns None if no alignment is found.

    **Output**: `defaultdict(<class 'list'>, {1008: [1817], 1009: [1818], ...`

    ```
    from globalfn.alignments import all_alignments

    print(all_alignments('en-se'))
    ```


2. `globalfn.alignments.aligned_with(ID, to_lang)`

    **Purpose**: Retrieves the alignments (in the specified to_lang) with the sentence ID. Returns a tuple where the first item is the source ID (or tuple), and the second item is a list of aligned sentence IDs. Returns (ID, None) if no alignment is found.

    **Output**: `(1010, [1819])`
    ```
    from globalfn.alignments import aligned_with

    print(aligned_with(1100, 'se'))
    ```


### 3. Retrieves Annotations
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

Codes:
1. `globalfn.annotations.all_annotations(lang)`

    **Purpose**: Retrieves all the manual annotations associated with the TED Talk transcript of language `lang`

    **Output**: `defaultdict(<class 'list'>, {1275: [Annotation, Annotation],...})`

    ```
    from globalfn.annotations import all_annotations

    print(all_annotations("de"))
    ```

2. `globalfn.annotations.annotation(sent_ID)`

    **Purpose**: Retrieves the manual annotation(s) associated with the sentence ID.

    **Output**: `Annotation`

    ```
    from globalfn.annotations import annotation

    print(annotation(1010))
    ```

# FE Divergences Under Same Semantic Frame

This folder contains files in the pseudo-CoNLL format for further research on FE Divergences when an aligned sentence pair shares an annotated semantic frame.

### Folder Directory
```
fe_divergences/
  en-de/
    allFE_divergence.txt
    coreFE_divergence.txt
    en_de_1010_1277_2432_9246.tsv
    ...
  en-pt/
    allFE_divergence.txt
    coreFE_divergence.txt
    en_pt_1010_739_2432_1260.tsv
    ...
  
```

### File Description
`allFE_divergence.txt` contains a list of filenames where there are discrepancies in the annotated core and non-core frame elements. 

`coreFE_divergence.txt` contains a list of filenames where there are discrepancies in the annotated core frame elements. 

The filename of the `tsv` file comprises the information of the language pair, the pair of sentence IDs, and the pair of annotation IDs. In each file, there are two annotated sentences that share the same semantic frame and are separated by an empty line. Each column, separated by tabs, in the file is as follows
```
Word | Universal_POS | Fine_graind_POS | Lexical_unit | Semantic_frame | Frame_element | Is_core_FE
```

# Frame Divergence of Aligned Lexical Units

### Description
Each document contain the information of aligned pairs of frame-evoking words and their annotated semantic frames for a bilingual sentence pair. The lexical units are aligned with [`fast_align`](https://github.com/clab/fast_align) (Dyer, Chahuneau, & Smith, 2013). 


### Result
The first line is the aligned pair of tokenized sentences, separated by three pipes "|||". The second line is the pair of frame annotations (separated by three dashes "---") for the aligned sentences. The number denotes the (0-based) word index of the frame-evoking word, whereas the string represents the frame name. 

For instance, in the first example in the image below (retrieved from the "en-pt.txt" document), the first line contains the English tokenized sentence "It 's been great , has n't it ?" and the Portuguese sentence "Tem sido ótimo , não tem ?". The second line indicates that the fourth word (word index 3) in the English sentence evokes the frame *Desirability*, whereas the third word (word index 2) in the Portuguese sentence evokes the same frame *Desirability*.

![Result](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/assets/result_frame_divergence.png)

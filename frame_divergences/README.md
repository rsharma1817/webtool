# Frame Divergence of Aligned Lexical Units

### Description
Each document contain the information of aligned pairs of frame-evoking words and their annotated semantic frames for a bilingual sentence pair. The lexical units are aligned with [`fast_align`](https://github.com/clab/fast_align) (Dyer, Chahuneau, & Smith, 2013). 


### Result
The first sentence is the aligned pair of sentences, separated by three pipes "|||".
The second sentences is the pair of frame annotations for the aligned lexical units, separated by three dashes "---". The number denotes the word index, whereas the string represents the frame name. 
For instance, in the first example in the image below, for the sentence "It 's been great , has n't it ?", the fourth word (word index 3) evokes the frame *Desirability*.

![Result](https://github.com/FrameNetBrasil/webtool/blob/gsoc2020_1/GSoC2020/weekly_reports/assets/result_frame_divergence.png)
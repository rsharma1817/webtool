### Prerequisites

1. Download the folder of `globalfn` (https://github.com/FrameNetBrasil/webtool/tree/gsoc2020_1/globalfn) into this folder.

2. Unzip `tmps.zip`.

3. Create an additional folder `saved/` as such:

   ```
   saved/
      embeddings/
   	models/
   	pos/
   	results/
   		modification_1/
   		modification_2/
   ```



### Description of each Jupyter Notebooks

`target-identification.ipynb`: Implement the LU identification part of the the any-langauge frame semantic parser and modification 1 (n-gram embeddings and cosine similarity).

`frame-identification.ipynb`: Implement the frame identification part of the any-langauge frame semantic parser and modification 2 (limit the search space for frame identification)

`eval_LU.ipynb`: Evaluate LU identifcation using precision, recall, and F1.

`eval_frame.ipynb`: Evaluate frame identifcation using precision, recall, F1, and FSME.

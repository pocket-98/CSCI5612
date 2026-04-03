import pandas as pd

if __name__ == "__main__":
    datafile = "../pca/stackoverflow_quant.csv"
    quant_df = pd.read_csv(datafile, index_col=0)
    print(quant_df.head(5))
    print(quant_df.describe())
    print()
    datafile = "../pca/stackoverflow_pca.csv"
    pca_df = pd.read_csv(datafile, index_col=0)
    print(pca_df.head(5))
    print(pca_df.describe())
    pca_df.to_csv("stackoverflow_pca.csv")

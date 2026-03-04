import numpy as np
import pandas as pd
from sklearn.decomposition import PCA
import matplotlib.pyplot as plt

def get_pca_data(df, n=3):
    pca = PCA(n_components=n)
    X_pca = pca.fit_transform(df.to_numpy())

    eigenvalues = pca.explained_variance_
    eigenvectors = pca.components_
    explained_ratio = pca.explained_variance_ratio_
    eigenveclist = list(eigenvectors[j,:] for j in range(len(eigenvalues)))

    for i, (eig, vec, ratio) in enumerate(zip(eigenvalues, eigenveclist, explained_ratio)):
        print(f"PC{i+1}:")
        print(" Eigenvalue: %.4f" % eig)
        print(" Eigenvector:", np.round(vec, 4))
        print(" Variance Explained: %.2f %%" % (ratio * 100))

    print("Total Variance Explained: %.2f %%" % sum(explained_ratio*100))
    return pca, X_pca


def plot_feature_importance(feature_names, pca, output_png="output.png"):
    relative_importance = []
    n_vecs = len(pca.components_)
    for j in range(len(pca.components_)):
        pc = pca.components_[j]
        rel_imp = np.abs(pc) / np.sum(np.abs(pc))
        relative_importance.append(rel_imp)
    relative_importance = np.array(relative_importance)

    plt.figure(figsize=(8,6))
    bottom = np.zeros(n_vecs)
    for i, feature in enumerate(feature_names):
        plt.bar(
            [f'PC{j+1}' for j in range(n_vecs)],
            relative_importance[:, i],
            bottom=bottom,
            label=feature
        )
        bottom += relative_importance[:,i]

    plt.ylabel("Relative Importance")
    plt.title("Stacked Relative Feature Importance by Principal Component")
    plt.legend( bbox_to_anchor=(1.05, 1), loc="upper left")
    plt.tight_layout()
    plt.savefig(output_png)


def plot2d(X, output_png="output.png"):
    fig = plt.figure(figsize=(8,6))
    ax = fig.add_subplot(111)
    pc1 = X[:,0]
    pc2 = X[:,1]
    ax.scatter(pc1, pc2, marker=".", cmap="Paired")
    plt.title("Transformed Data (PCA n_components=2)")
    ax.set_xlabel("pc1")
    ax.set_ylabel("pc2")
    m1 = min(pc1)
    M1 = max(pc1)
    m2 = min(pc2)
    M2 = max(pc2)
    plt.xlim(m1, M1)
    plt.ylim(m2, M2)
    plt.savefig(output_png)


def plot3d(X, output_png="output.png"):
    fig = plt.figure(figsize=(8,6))
    ax = fig.add_subplot(111, projection="3d")
    pc1 = X[:,0]
    pc2 = X[:,1]
    pc3 = X[:,2]
    ax.scatter(pc1, pc2, pc3, marker=".", cmap="Paired")
    plt.title("Transformed Data (PCA n_components=3)")
    ax.set_xlabel("pc1")
    ax.set_ylabel("pc2")
    ax.set_zlabel("pc3")
    m1 = min(pc1)
    M1 = max(pc1)
    m2 = min(pc2)
    M2 = max(pc2)
    m3 = min(pc3)
    M3 = max(pc3)
    ax.set_xlim(m1, M1)
    ax.set_ylim(m2, M2)
    ax.set_zlim(m3, M3)
    plt.savefig(output_png)

if __name__ == "__main__":
    datafile = "stackoverflow_quant.csv"
    df = pd.read_csv(datafile, index_col=0)
    print("covar:")
    print(df.cov())
    print("performing pca with n=2")
    pca, X_pca = get_pca_data(df, n=2)
    print()
    print("performing pca with n=3")
    pca, X_pca = get_pca_data(df, n=3)
    print("plotting feature importance")
    plot_feature_importance(df.columns, pca, "pca_feature_importance.png")
    plot2d(X_pca, "pca_2.png")
    plot3d(X_pca, "pca_3.png")

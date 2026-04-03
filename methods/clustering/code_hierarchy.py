import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.cluster import AgglomerativeClustering
from sklearn.metrics import silhouette_score
from scipy.cluster.hierarchy import dendrogram

def plot_scatter(X, labels, title="scatter", output_png="output.png"):
    fig = plt.figure(figsize=(8,6))
    mins = list(min(X[:,j]) for j in range(3))
    maxs = list(max(X[:,j]) for j in range(3))
    ax = fig.add_subplot(111, projection="3d")
    ax.scatter(X[:,0], X[:,1], X[:,2], c=labels, marker=".", cmap="Paired")
    plt.title(title)
    ax.set_xlabel("PC1")
    ax.set_ylabel("PC2")
    ax.set_zlabel("PC3")
    ax.set_xlim(mins[0]-.1, maxs[0]+.1)
    ax.set_ylim(mins[1]-.1, maxs[1]+.1)
    ax.set_zlim(mins[2]-.1, maxs[2]+.1)
    plt.savefig(output_png)

def plot_dendogram(model, title, output_png="output.png"):
    # https://scikit-learn.org/stable/auto_examples/cluster/plot_agglomerative_dendrogram.html
    counts = np.zeros(model.children_.shape[0])
    n_samples = len(model.labels_)
    for i, merge in enumerate(model.children_):
        current_count = 0
        for child_idx in merge:
            if child_idx < n_samples:
                current_count += 1  # leaf node
            else:
                current_count += counts[child_idx - n_samples]
        counts[i] = current_count

    linkage_matrix = np.column_stack(
        [model.children_, model.distances_, counts]
    ).astype(float)

    plt.figure(figsize=(8,6))
    plt.title(title)
    dendrogram(linkage_matrix)
    plt.savefig(output_png)

def plot_silhouettes(silhouettes, output_png="output.png"):
    plt.figure(figsize=(8,6))
    k = list(sorted(silhouettes.keys()))
    s = list(silhouettes[j] for j in k)
    plt.plot(k, s, marker="x")
    plt.xlabel("k")
    plt.ylabel("silhouette score")
    plt.title("Agglomerative K vs Silhouette Score")
    plt.savefig(output_png)

if __name__ == "__main__":
    df = pd.read_csv("stackoverflow_pca.csv", index_col=0)
    X = df.to_numpy()
    X_sample = X[np.random.choice(a=np.arange(X.shape[0]), size=X.shape[0]//20, replace=False)]
    silhouettes = dict()
    for k in range(2,6):
        agglomerator = AgglomerativeClustering(n_clusters=k, compute_distances=True)
        model = agglomerator.fit(X_sample)
        labels = model.labels_
        silhouette = silhouette_score(X_sample, labels)
        silhouettes[k] = silhouette
        print("k = %d" % k)
        print("  silhouette: %.3f" % silhouette)
        plot_scatter(X_sample, labels, "agglomerative k=%d" % k,"agglomerative-k%d.png" % k)
        plot_dendogram(model, "agglomerative dendogram k=%d" % k, "agglomerative-dend-k%d.png" % k)
        print()
    plot_silhouettes(silhouettes, "agglomerative-silhouette.png")

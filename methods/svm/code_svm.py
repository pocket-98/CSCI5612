import numpy as np
import pandas as pd
import matplotlib.pyplot as plt

from sklearn.preprocessing import StandardScaler
from sklearn.model_selection import train_test_split
from sklearn.svm import SVC
from sklearn.metrics import accuracy_score
from sklearn.metrics import confusion_matrix
from sklearn.metrics import ConfusionMatrixDisplay


df = pd.read_csv("stackoverflow_labeled.csv", index_col=0)
y = df["LabelEmploymentStatus"]
X = df.drop(columns=["LabelEmploymentStatus"])
scaler = StandardScaler()
scaled = scaler.fit_transform(X)
col_tail = "S"
X_scaled = pd.DataFrame({X.columns[j]+col_tail: scaled[:,j] for j in range(scaled.shape[1])})

X_train, X_test, y_train, y_test = train_test_split(X_scaled, y, test_size=0.2, random_state=42)

X_train2, X_test2, y_train2, y_test2 = train_test_split(X_train, y_train, test_size=0.9, random_state=42)
svm = SVC(kernel="rbf", probability=True)
svm.fit(X_train2, y_train2)

yhat_test = svm.predict(X_test)
accuracy = accuracy_score(y_test, yhat_test)
print("gaussian kernel svm accuracy: %.4f" % accuracy)
confmat = confusion_matrix(y_test, yhat_test)
print()
print("confusion matrix")
print(confmat)


classNames = ["Unemployed", "Employed"]
disp = ConfusionMatrixDisplay(confmat, display_labels=classNames)
disp.plot(cmap="Blues")
disp.figure_.set_figwidth(8)
disp.figure_.set_figheight(6)
disp.ax_.set_title("Confusion Matrix For Gaussian Kernel SVM Classifier")
plt.savefig("svm_conf.png", dpi=300)
plt.close()



### The associations between `CLIENT`, `COMMANDE`and `PRODUIT`:
client  __places __ Commnade.
commande -- contiens -- products
products -- present --commandes 

##  cardinalities:
client -(0,N)- places -(1,1)- Commnade.
commande -(1-N)- contiens -(0,N)- products


## MCD:
(ignore the format and type (varchar / uuid ...))
![[Pasted image 20260910152020.png]](MCD.png)
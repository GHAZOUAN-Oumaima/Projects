#include<stdio.h>
#include<stdlib.h>


typedef struct _arbre {
	 int cle;
	 struct _arbre *gauche; 
	 struct _arbre *droit; 
} arbre;

arbre* cree(int cle){
	arbre * feuille=(arbre*)malloc(sizeof(arbre));
	if(feuille!=NULL){
		feuille->cle=cle;
		feuille->gauche=NULL;
		feuille->droit=NULL;
	}
	return feuille;
	
	
}
arbre * ajouter(int el, arbre *r){
	if(r==NULL){
		r=cree(el);
	}
	else{
		if(el<r->cle) r->gauche=ajouter(el,r->gauche);
		else r->droit=ajouter(el,r->droit);
	}
	return r;
}
void explorer(arbre *r){
	if(r!=NULL){
		explorer(r->gauche);
		printf("%d ",r->cle);
		explorer(r->droit);
	}
}



arbre * CreeArbre(arbre *r,int tab[] , int taille){
	int i;
	for(i=0;i<taille;i++){
		r=ajouter(tab[i],r);
	}
	return r;
}
int main(){
	arbre *r=NULL;int i=0;
	int tab[]={55,34,49,20,38,58,10,50,25,22,24};
	r=CreeArbre(r,tab,11);
	printf("parcour in-ordre : \n");
	explorer(r);
	
}

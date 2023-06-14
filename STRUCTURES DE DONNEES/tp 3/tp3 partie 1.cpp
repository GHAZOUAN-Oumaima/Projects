#include<stdio.h>
#include<stdlib.h>


typedef struct arbre {
	 int cle;
	 struct arbre *gauche; 
	 struct arbre *droit; 
} arbre;

arbre* cree_elm(int x){
	arbre * elm=(arbre*)malloc(sizeof(arbre));
	if(elm!=NULL){
		elm->cle=x;
		elm->gauche=NULL;
		elm->droit=NULL;
	}
	return elm;
	
	
}
arbre * ajouter(int x, arbre *r){
	if(r==NULL){
		r=cree_elm(x);
	}
	else{
		if(x<r->cle) r->gauche=ajouter(x,r->gauche);
		else r->droit=ajouter(x,r->droit);
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



arbre * Cree_Arbre(arbre *r,int t[] , int taille){
	int i;
	for(i=0;i<taille;i++){
		r=ajouter(t[i],r);
	}
	return r;
}

arbre *supprimer(int el, arbre*racine)
{
    if (racine == NULL)
    {
        return NULL ;
    }

    if (el < racine->cle)
    {
        supprimer(el, racine->gauche);
    }
    else if (el > racine->cle)
    {
        supprimer(el, racine->droit);
    }
    else
    {
        //  pas d'enfants
        if (racine->gauche == NULL && racine->droit == NULL)
        {
            free (racine);
            racine = NULL;
        }
        // un seul enfant
        else if (racine->gauche == NULL)
        {
            arbre* temp = racine;
            racine = racine->droit;
            free(temp);
        }
        else if (racine->droit == NULL)
        {
            arbre* temp = racine;
            racine = racine->gauche;
            free(temp);
        }
        //   deux enfants
        else
        {
             arbre *min = racine->droit;
          while (min->gauche != NULL)
          {
             min = min->gauche;
         }
           
             racine->cle = min->cle;
          
             racine->droit = supprimer(min->cle, racine->droit);
        }
    }
    
 return racine;
}

int main(){
	arbre *r=NULL;
	int i=0;
	int t[]={55,34,49,20,38,58,10,50,25,22,24};
	r=Cree_Arbre(r,t,11);
	printf("parcours : \n");
	explorer(r);
	supprimer( 20, r);
	
	printf("parcours apres suppression: \n");
	explorer(r);
	
	
}

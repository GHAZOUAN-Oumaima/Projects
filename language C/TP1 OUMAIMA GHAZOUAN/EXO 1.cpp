#include<stdio.h>
#include<conio.h>

int main(){


int longu, lang, P, S;

printf("\t\t\t ***********************");
printf("\n\t\t\t ** TP 1 : EXERCICE 1 **\n");
printf("\t\t\t ***********************\n\n");

//Saisir la longueur et la largeur:

printf("Entrez la longueur et la largeur : ");
scanf("%d %d",&longu,&lang);

//Calcule du périmètre et la surface:

S = longu * lang;
P = 2*(longu+lang);

//Affichage des résultats:

printf("\nLe perimetre : %d\nLa surface : %d",P,S);


getch();

}


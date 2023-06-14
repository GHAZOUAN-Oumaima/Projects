#include<stdio.h>
#include<conio.h>

int main(){


int n;

printf("\t\t\t *************************");
printf("\n\t\t\t ** TP 1 : EXERCICE 2-3 **\n");
printf("\t\t\t *************************\n\n");

//Saisir un nombre:

printf("Entrez un chiffre compris entre 1 et 7 : ");
scanf("%d",&n);

//La verification:

switch(n)
{
 case 1: printf(" Lundi");
		 break;
 case 2: printf(" Mardi");
		 break;
 case 3: printf(" Mercredi");
		 break;
 case 4: printf(" Jeudi");
		 break;
 case 5: printf(" Vendredi");
		 break;
 case 6: printf(" Samedi");
		 break;
 case 7: printf(" Dimanche");
		 break;
 default: printf(" erreur! \a \a \a ");

}



getch();

}


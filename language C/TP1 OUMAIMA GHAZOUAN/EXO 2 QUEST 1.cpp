#include<stdio.h>
#include<conio.h>

int main(){


char c;

printf("\t\t\t *************************");
printf("\n\t\t\t ** TP 1 : EXERCICE 2-1 **\n");
printf("\t\t\t *************************\n\n");

//Saisir une lettre:

printf("Devinez une lettre : ");
scanf("%c",&c);

//La verification:

if(c == 'a' || c == 'A') printf("\n Bravo ! Votre reponse est correcte.");
else
  printf("\a \a\n Votre reponse est fausse :( ");



getch();

}


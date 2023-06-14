#include<stdio.h>
#include<conio.h>
#include<math.h>

int main(){

int i=1,k;
float a,max=0;

printf("\t\t\t *************************");
printf("\n\t\t\t ** TP 1 : EXERCICE 3-2 **\n");
printf("\t\t\t *************************\n\n");

//Saisir et traitement des données :

printf("Saisissez 5 nombres :\n\n");


do{
    printf("\t- le %deme nombre :",i);
    scanf("%f",&a);
	if(max < a)
	{
		   max = a;
		   k = i;
    }
	i++;

}while(i < 6);

//Affichage des résultats :

printf("\n Le max est %.2f, sa position etait %d",max,k);



getch();

}


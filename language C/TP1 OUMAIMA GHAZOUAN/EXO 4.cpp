#include<stdio.h>
#include<conio.h>
#include<math.h>

int main(){

int n,m,i,som_div_n=1,som_div_m=1;

printf("\t\t\t ************************");
printf("\n\t\t\t ** TP 1 : EXERCICE 5 **\n");
printf("\t\t\t ************************\n\n");

//Saisir un nombre entier :

printf("Saisissez deux nombres entiers :");
scanf("%d %d",&n,&m);



//La Somme des diviseurs de n :

for(i=2 ; i< n ; i++ )
{
		if(n%i == 0) som_div_n+=i;
}

//La Somme des diviseurs de m :

for(i=2 ; i< m ; i++ )
{
		if(m%i == 0) som_div_m+=i;
}


if( som_div_n == m && som_div_m == n ) printf("les deux entiers %d et %d sont amicaux.",n,m);
  else
     printf("les deux entiers %d et %d ne sont pas amicaux.",n,m);

getch();

}

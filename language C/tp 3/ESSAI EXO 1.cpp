#include<stdio.h>
#include<conio.h>


int max(int a, int b)
{
	return (a<b)?b:a;
}

int min(int a, int b)
{
	return (a<b)?a:b;
}

int main(){

int nbr1, nbr2;



printf("Donner le 1er nombre : ");
scanf("%d",&nbr1);
printf("Donner un 2eme nombre : ");
scanf("%d",&nbr2);

printf("\n  - Maximum : %d \n  - Minimum : %d ",max(nbr1,nbr2),min(nbr1,nbr2));


getch();

}

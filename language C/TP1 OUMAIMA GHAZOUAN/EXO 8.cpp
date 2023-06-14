#include<stdio.h>
#include<conio.h>

int main()
{

int i,K,p=1;



do
{  printf("Entrez un entier : ");
   scanf("%d",&K);
}while( K<0 );

for(i=2;i<=K;i++)
{
  p *= i;
}

printf("%d! = %d ",K,p);


getch();

}

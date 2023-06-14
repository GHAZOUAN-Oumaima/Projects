 #include<stdio.h>
#include<conio.h>

int main()
{

int i,j,n,K,f=1;
float x,s=1,p=1;

do
{  printf("Entrez un nombre strictement positif : ");
   scanf("%f",&x);
}while( x<=0 );

do
{  printf("Entrez un entier positif : ");
   scanf("%d",&n);
}while( n<0 );

for(i=1;i<=n;i++)
{
  for(j=1;j<=i;j++) f *= j;
  
  for(j=1;j<=i;j++) p *= x;
  
  s += (float)(p/f);

}



printf(" La somme est : S = %f ",s);


getch();

}

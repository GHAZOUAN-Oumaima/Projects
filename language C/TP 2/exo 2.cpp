#include<stdio.h>
#include<conio.h>
#include<math.h>

int main(){

int N,i,j,s=0;
int T[N];

printf("Donner le nombre d'element : ");
scanf("%d",&N);


for(i=0;i<N;i++)
{
  printf("T[%d] : ",i);
  scanf("%d",&T[i]);
}
for(i=0 ; i<N && s == 0 ; i++)
{
for (int j=2 ; j<=sqrt(N) ; j++)
       {
           if (i%j==0)
              s+=1;
           
       }}
        

if(s== 0) printf("Le tableau est premier");
 else
   printf("Le tableau n'est pas premier");

getch();}

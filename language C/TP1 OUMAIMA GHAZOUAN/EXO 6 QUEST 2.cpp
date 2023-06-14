#include<stdio.h>
#include<conio.h>

int main()
{

int i,j,Un,Un_1 = 4,Un_2 = 4;


for(j=0;j<=99;j++)
{
if(j==1 || j==0) Un = 4;
 else
 {
   Un_1 = 4;
   Un_2 = 4;
   for(i=2;i<=j;i++)
   {
     Un = 3*Un_1 + 4*Un_2 +6;
     Un_2 = Un_1;
     Un_1 = Un;
   }
 }
   
printf("U%d = %d",j,Un);

}

getch();

}

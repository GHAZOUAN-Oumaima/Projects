#include<stdio.h>
#include<conio.h>


int main(){

  
  int N,x,i,j,s,position;
  int T[N];


  printf("N=  ");
  scanf("%d",&N);

  
  
  for(int i=0 ; i < N ; i++)
  {
	printf("T[%d]=",i);
	scanf("%d",&T[i]);
	}
	
	printf("x=  ");
    scanf("%d",&x);	
    s=0;
    for(int i=0 ; i < N ; i++)
    {
	
    if(T[i]==x )
		 {
		 printf("%d existe dans la position %d \n",x,i);
		 s++;
	}
		 
}
   
    printf("\nle nbr d'occ de %d est %d",x,s);

for(int i=0 ; i<N ; i++)
{
	if (T[i]==x)


   {
   
      for (j = position - 1; j< N- 1; j++)
         T[j] = T[j+1];
 
      printf(" Aprés la suppression, le tableau = ");
 
      for (i = 0; i < N- 1; i++)
         printf("%d", T[i]);
  
  
}
 
}


getch();
}

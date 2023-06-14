#include<stdio.h>

int main()
{
	int N1,N2,i,permutation;
	int T1[N1],T2[N2],T3[N1+N2];
	
	
	printf("N1=  ");
  	scanf("%d",&N1);

  
  
for(int i=0 ; i < N1 ; i++)
  {
	printf("T1[%d]=",i);
	scanf("%d",&T1[i]);
	}
  
	
	
	printf("N2=  ");
  	scanf("%d",&N2);

  
  
  for(int i=0 ; i < N2 ; i++)
  {
	printf("T2[%d]=",i);
	scanf("%d",&T2[i]);
	}
	

for (i=0 ; i<N1 ; i++)	
	
		T3[i]=T1[i];
for (i=0 ; i<N2 ; i++)			
     	T3[i+N1]=T2[i];
   for (i=0 ; i<N1+N2 ; i++)  	
     	printf("T[%d]=%d  ",i,T3[i]);
for (i=0 ; i<N1+N2 ; i++)
{
  if (T3[i+1]<=T3[i])
  {
  	permutation=T3[i];
  	T3[i]=T3[i+1];
  	T3[i+1]=permutation;
  	permutation=0;
  }

	
}
	
for (i=0 ; i<N1+N2 ; i++)  	
     	printf("T[%d]=%d  ",i,T3[i]);	
getchar()	;
}


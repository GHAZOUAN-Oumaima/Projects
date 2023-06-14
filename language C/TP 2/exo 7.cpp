#include<stdio.h>
#include<conio.h>
int main()
{
	int N,iT,iV,i;
	int T[N];
	printf("N=");
	scanf("%d",&N);
	for (int i=0;i<N;i++)
	{
		printf("T[%d]=",i);
		scanf("%d",&T[i]);
		
	}
	
	 iT=0;
  for(int i=0;i<N;i++)
  {
	 iV=0;
	 while(iV<i && T[iV]!=T[i]) iV++;
	 if(iV == i) //cad tous les elements quon a parcouru differe les uns autres 
	 {
        T[iT]=T[i];
        iT++;
     }
  }
  N=iT;
  for(i=0;i<N;i++)
  {
	printf(" T[%d] : %d ",i,T[i]);
  }
   getchar();
   
}


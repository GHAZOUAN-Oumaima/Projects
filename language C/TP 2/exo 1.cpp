#include<stdio.h>
#include<conio.h>
int main()
{
int N,i,min,s,max,moy,j ;
int T1[N];
int T2[N];	

	printf("donner un entier");
	scanf("%d",N);
	 
	for(i=0;i<N;i++)
	{
		printf("entrer le",i+1," element");
		scanf("%d",&T1[i]);
		
	}
	max=T1[0];
	min=T1[0];
	moy=0;
	
	for(i=0;i<N;i++)
	{
		moy+=T1[i];
		if(T1[i]>max) max=T1[i];
		if(T1[i]<min) min=T1[i];
	}
	moy=moy/N;
	for(i=0;i<N;i++)
	{
	
		j=0;
		s=0;
		while((j!=i )&&(T1[i]==T1[j]))
		{
		s+=1;
		j+=1;	
		}
		printf("le nombre d'occurence de",T1[i],"est",s);
		
	}
	for (i=N-1;i>0;i--)
	{
	    T2[N-1-i]=T1[i];
		
	}
	printf(" Le minimum : %d\n  Le maximum : %d \n -La moyenne : %d ",min,max,moy);
	printf("le tableau inversé est",T2);
	
	}
	
	
	
	
	
	
	
	
	


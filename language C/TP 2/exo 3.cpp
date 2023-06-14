#include<stdio.h>
#include<conio.h>
#include<math.h>
int main() {
    int N1,som_div1,som_div2,i,k,j ;
    int tab[N1];
    
    printf("entrer un entier N1");
    scanf("%d",&N1);
    for(int i = 0 ; i < N1; i++) 
{
		printf("T[%d]=",i);
	    scanf("%d",&tab[i]);}
	    
	for(int i=0 ; i < N1 ; i++)
	{
		for(int j=i+1 ; j<N1 ; j++)
		{
			for(k=2 ; k< tab[i]; k++ )
			{
				if(tab[i]%k == 0) som_div1+=k;
			}
    		for(k=2 ; k< tab[j]; k++ )
			{
				if(tab[j]%k == 0) som_div2+=k;
				}
			if( som_div1 == tab[j]&& som_div2 == tab[i] ) 
				printf("les deux entiers %d et %d sont amicaux.",tab[i],tab[j]);
  			else
     			printf("les deux entiers %d et %d ne sont pas amicaux.",tab[i],tab[j]);
		}


    }

getch();
		
	
							 }                         

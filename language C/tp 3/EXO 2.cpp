#include<stdio.h>


void LIRE(int *tab, int N)
{
	int i;
	printf("remplissage du tableau");
	for (i=0,i<N,i++)
	{
		printf("  tab[%d]=  ",i);
		scanf("%d",&tab[i]);
		
	}
}


void AFFICHAGE(int *tab, int N)
{ 
	int i
	printf("affichage du tableau:  ");
	for (i=0,i<N,i++)
	{
		printf("tab[%d]= %d",i,tab[i]);
	}
}


void INVERSER (int *tab, int N)
{
	int i,r;
	for (i=0,i<N/2,i++)
	{
		r=T[i];
		T[i]=T[N-i-1];
		T[N-i-1]=r,
		
		}	
}

void trier(int *tab, int N)
{
	 int i,j,temp;
	 
	 for(i=1;i<N;i++)
	 {
		temp = tab[i];
		j = i-1;
		while( j>=0 && tab[j] > temp )
		{
		   tab[j+1] = tab[j];
		   j--;
        }
        tab[j+1] = temp;
	 }
}

int recherche(int *tab, int N, int x)
{
	int i=0;
	while(i<N && tab[i]!=x) i++;
	if(i < N) return i;
	 else return -1;
}

int recherche_dichotomie(int *tab, int N, int x)
{
	int ipremier = 0, idernier = N-1, trouve=0, imilieu;
	
	trier(tab,N);
	
	while( (ipremier <= idernier) && trouve == 0 )
	{
	   imilieu = (ipremier + idernier)/2 ;
	   if( tab[imilieu] == x  ) trouve = 1;
	   else
		 if(tab[imilieu] > x) idernier = imilieu-1;
		  else
			ipremier = imilieu+1;
    }
    if(!trouve) return -1;
      else return imilieu;
}

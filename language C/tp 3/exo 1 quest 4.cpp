#include<stdio.h>
int carre(int a)
{ 	return a*a;
}


int main()
{
	int A;
	printf("entrer A  ");
	scanf("%d",&A);
	printf("le carre de %d est: %d",A,carre(A));
	
getchar();
}

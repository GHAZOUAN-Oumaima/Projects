#include<stdio.h>


int MAX(float a, float b)
{
	if (a<b)
		return b;
	else 
		return a;	
}

int MIN(float a, float b)
{
	if (a<b)
		return a;
	else 
		return b;	
}


int main ()
{
	int A,B;
	printf(" entrer A ");
	scanf("%d",&A);
	printf(" entrer B");
	scanf("%d",&B);
	printf(" le maximum est :   ",MAX(A,B));
	printf("le minimum est  :   ",MIN(A,B));
	
getchar();	
	
}

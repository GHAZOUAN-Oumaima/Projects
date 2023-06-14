#include<stdio.h>



int A,B;

void lecture()
{
	 printf("\nDonner un entier A: ");
	 scanf("%d",&A);
	  printf("Donner un entier B: ");
	  scanf("%d",&B);
}

int somme(int a, int b)
{
	return a+b;
}

int produit(int a, int b)
{
	return a*b;
}


int main(){



lecture();
printf("%d",somme(A,B));
printf("%d",produit(A,B));


getchar();

}





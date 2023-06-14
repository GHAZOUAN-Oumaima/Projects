#include<stdio.h>
#include<stdlib.h>
#include<conio.h>
#define FICHIER "client.txt"
int main(){
	FILE*ptrFichier;
	int code;
	char nom[80];
	double solde;
	int i=0;
	ptrFichier=fopen(FICHIER,"r");
	if(!ptrFichier)
	{
		printf("ouverture en écriture du fichier est impossible\n");
		exit(-1);
	
	}
	while(fscanf(ptrFichier,"%d %s %f",&code, &nom, &solde)!=EOF)
	{
		printf("\n client numero: %d \n code: %d \n nom: %s \n solde: %f \n", i+1,code, nom, solde);
        i++;	}
	fclose(ptrFichier);
	return 0;
}

#include<stdio.h>
#include<stdlib.h>
#include<conio.h>
#define FICHIER "client.txt"
#define Malloc(type) (type *)malloc(sizeof(type))

typedef struct client{
	int code;
	char nom[80];
	double solde;
	}client;
	
	
int main(){
	FILE*ptrFichier;
	
	client *client1= Malloc(client);
	client *client2= Malloc(client);
	ptrFichier=fopen(FICHIER,"w");
	if(!ptrFichier)
	{
		printf("ouverture en écriture du fichier est impossible\n");
		exit(-1);
	
	}
	printf("ouverture en écriture du fichier est possible\n");
	
		printf("\n Donner les infos sur le client numero 1");
		printf("code :");
		scanf("%d",&client1->code);
		printf("nom :");
		scanf("%s",&client1->nom);
		printf("solde :");
		scanf("%f",&client1->solde);
		fprintf(ptrFichier,"%d %s %f \n",client1->code,client1->nom,client1->solde);
		
		
		printf("\n Donner les infos sur le client numero 2");
		printf("code :");
		scanf("%d",&client2->code);
		printf("nom :");
		scanf("%s",&client2->nom);
		printf("solde :");
		scanf("%f",&client2->solde);
		fprintf(ptrFichier,"%d %s %f \n",client2->code,client2->nom,client2->solde);
		
	
	
	fclose(ptrFichier);
	return 0;
}


#include<stdio.h>
void mentionbac(float note)
{
	if (note>=16)
		printf("tres bien");
    else
    	if(note<=16 && note>=14)
    		printf("bien");
    	else 
    		if(note<=14 && note>=12)
    			printf("assez bien");
    		else 
    			if(note<=12 && note>=10)
    				printf("moyen");
    			else
    				printf("faible");
    			
}


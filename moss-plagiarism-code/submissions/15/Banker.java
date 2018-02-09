import java.util.*;
/*class Node
{
	int data;
	Node next;
	Node(int x)
	{
		data=x;
		Node=null;
	}
}*/
class Banker
{
	public static void main(String args[])
	{
		Scanner src=new Scanner(System.in);
		int alloc[][],max[][],available[],need[][],work[],finish[];
		System.out.println("Enter the no. of processes : ");
		int n=src.nextInt();
		System.out.println("Enter the no. of instances : ");
		int ins=src.nextInt();
		alloc=new int[n][ins];
		max=new int[n][ins];
		need=new int[n][ins];
		work=new int[ins];
		available=new int[ins];
		finish=new int[n];
		finish[0]=0;
		System.out.println("Enter the values for allocation : ");
		for(int i=0;i<n;i++)
			for(int j=0;j<ins;j++)
			{
				alloc[i][j]=src.nextInt();
			}
		System.out.println("Enter the values for max : ");
		for(int i=0;i<n;i++)
			for(int j=0;j<ins;j++)
				max[i][j]=src.nextInt();
		System.out.println("Enter the value for available : ");
		for(int i=0;i<ins;i++)
			available[i]=src.nextInt();
		for(int i=0;i<n;i++)
			for(int j=0;j<ins;j++)
				need[i][j]=max[i][j]-alloc[i][j];
		for(int i=0;i<n;i++)
		{	for(int j=0;j<ins;j++)
				System.out.print(" "+need[i][j]);
			System.out.println();
		}
		
		for(int j=0;j<ins;j++)
				work[j]=available[j];
		
		for(int i=0;i<n;i++)
		{
			while(finish[i]==0)
			{	int j;	
				for(j=0;j<ins;j++)
				{
					if(need[i][j]<=work[j])
					{	
						work[j]=work[j]+alloc[i][j];
						break;
						
					}
				}
				if(j==ins-1)
					finish[i]=1;
				System.out.print(" "+"P"+i);
				System.out.println();
			}
		}
	}
}
					
		
		
			
		
		
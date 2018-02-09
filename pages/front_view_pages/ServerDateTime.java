import java.rmi.*;
import java.rmi.server.*;
import java.sql.*;
import java.util.Date;
public class ServerDateTime extends UnicastRemoteObject implements IDateTime {
String str;
Date d;
public ServerDateTime() throws RemoteException { }
public String getDateTime()throws RemoteException {
d = new Date();
str = "";
str = str + "Date : " + d.getDay() + "/" + d.getMonth() + "/" + (d.getYear()+1900) + "\nTime: " + d.getHours() + " : " + d.getMinutes() + " : " + d.getSeconds();
return str;
}
public static void main(String[] args) { 
try {
	ServerDateTime x=new ServerDateTime();
	Naming.rebind("abccc",x);
	System.out.println("Server Registered.");
} catch (Exception e1){e1.printStackTrace();}
}
}

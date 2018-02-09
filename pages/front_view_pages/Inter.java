//Inter.java
import java.rmi.Remote;
import java.rmi.RemoteException;
public interface Inter extends Remote {
public String getData(String s) throws RemoteException;
}

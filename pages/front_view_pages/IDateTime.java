import java.rmi.Remote;
import java.rmi.RemoteException;
public interface IDateTime extends Remote {
public String getDateTime() throws RemoteException;
}

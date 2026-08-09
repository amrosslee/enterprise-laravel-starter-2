import { Head, Link, router } from '@inertiajs/react';
import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import { dashboard } from '@/routes';
import Dashboard from '../dashboard';
import users from '@/routes/users';

export default function UsersIndex({ users, flash }) {
  const deleteUser = (userId) => {
    if (confirm("Are you sure you want to delete this user?")) {
      router.delete(`/users/${userId}`);
    }
  };
  return (
    <>
      <Head title="Users" />
      {/* <div style={{ marginBottom: "20px" }}>
        <h1>Users Management</h1>
        <Link
          href={users.create()}
          style={{
            backgroundColor: "#007bff",
            color: "white",
            padding: "10px 20px",
            textDecoration: "none",
            borderRadius: "5px",
          }}
        >
          Add New User
        </Link>
      </div> */}
      {/* {flash.success && (
        <div
          style={{
            backgroundColor: "#d4edda",
            padding: "10px",
            marginBottom: "20px",
            borderRadius: "5px",
          }}
        >
          {flash.success}
        </div>
      )} */}
      <table style={{ width: "100%", borderCollapse: "collapse" }}>
        <thead>
          <tr style={{ backgroundColor: "#f8f9fa" }}>
            <th style={{ border: "1px solid #ddd", padding: "10px" }}>ID</th>
            <th style={{ border: "1px solid #ddd", padding: "10px" }}>Name</th>
            <th style={{ border: "1px solid #ddd", padding: "10px" }}>Email</th>
            <th style={{ border: "1px solid #ddd", padding: "10px" }}>
              Actions
            </th>
          </tr>
        </thead>
        <tbody>
          {users.map((user) => (
            <tr key={user.id}>
              <td style={{ border: "1px solid #ddd", padding: "10px" }}>
                {user.id}
              </td>
              <td style={{ border: "1px solid #ddd", padding: "10px" }}>
                {user.name}
              </td>
              <td style={{ border: "1px solid #ddd", padding: "10px" }}>
                {user.email}
              </td>
              <td style={{ border: "1px solid #ddd", padding: "10px" }}>
                <Link
                  href={`/users/${user.id}/edit`}
                  style={{ marginRight: "10px", color: "#007bff" }}
                >
                  Edit
                </Link>
                <button
                  onClick={() => deleteUser(user.id)}
                  style={{
                    backgroundColor: "#dc3545",
                    color: "white",
                    border: "none",
                    padding: "5px 10px",
                    borderRadius: "3px",
                    cursor: "pointer",
                  }}
                >
                  Delete
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </>
  );
}




Dashboard.layout = {
            breadcrumbs: [
                {
                    title: 'Users',
                    href: users.index(),
                    },
                    ],
                    };

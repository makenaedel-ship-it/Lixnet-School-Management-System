// Entry point for School Management System Backend Boilerplate

require('dotenv').config();
const express = require('express');
const app = express();

// Middleware setup (placeholder)
app.use(express.json());

// Health check endpoint
app.get('/', (req, res) => {
  res.send('School Management System Backend Boilerplate is running!');
});

// Module routes (placeholders)
app.use('/api/users', (req, res) => res.send('Users module placeholder'));
app.use('/api/classes', (req, res) => res.send('Classes module placeholder'));
app.use('/api/exams', (req, res) => res.send('Exams module placeholder'));

// Start server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});